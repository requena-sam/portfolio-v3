<?php

use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\Messages\MessagesIndex;
use App\Livewire\Admin\Projects\ProjectForm;
use App\Livewire\Admin\Projects\ProjectsIndex;
use App\Livewire\Home\ContactForm;
use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;

function makeAdmin(): User
{
    return User::factory()->create([
        'email' => 'admin@samrequena.be',
        'password' => 'Ch4nge_Th1s!',
    ]);
}

test('guest is redirected to login when visiting admin', function () {
    $this->get('/admin')->assertRedirect(route('admin.login'));
});

test('admin can log in with correct credentials', function () {
    makeAdmin();

    Livewire::test(Login::class)
        ->set('email', 'admin@samrequena.be')
        ->set('password', 'Ch4nge_Th1s!')
        ->call('authenticate')
        ->assertRedirect(route('admin.dashboard'));

    $this->assertAuthenticated();
});

test('login fails with wrong password', function () {
    makeAdmin();

    Livewire::test(Login::class)
        ->set('email', 'admin@samrequena.be')
        ->set('password', 'wrong-password')
        ->call('authenticate')
        ->assertHasErrors('email');

    $this->assertGuest();
});

test('admin can create a project', function () {
    $this->actingAs(makeAdmin());

    Livewire::test(ProjectForm::class)
        ->set('slug', 'test-project')
        ->set('name', 'Test Project')
        ->set('icon', '🧪')
        ->set('type', 'Web App')
        ->set('year', 2026)
        ->set('description', 'A test project')
        ->set('stack', ['Laravel'])
        ->set('images', [[
            'url' => 'https://example.com/shot.png',
            'alt' => 'shot',
            'main' => true,
        ]])
        ->call('save')
        ->assertDispatched('closeProjectForm');

    expect(Project::query()->where('slug', 'test-project')->exists())->toBeTrue();
});

test('admin can edit a project', function () {
    $this->actingAs(makeAdmin());

    $project = Project::create([
        'slug' => 'edit-me', 'name' => 'Edit Me', 'icon' => '📦', 'type' => 'Web App',
        'year' => 2024, 'featured' => false, 'summary' => null, 'description' => 'desc',
        'stack' => ['PHP'], 'images' => [['url' => 'https://example.com/shot.png', 'alt' => 'shot', 'main' => true]],
        'link' => null, 'order' => 0,
    ]);

    Livewire::test(ProjectForm::class, ['projectId' => $project->id])
        ->set('name', 'Edited Name')
        ->call('save')
        ->assertDispatched('closeProjectForm');

    expect($project->fresh()->name)->toBe('Edited Name');
});

test('admin can open and close the project modal', function () {
    $this->actingAs(makeAdmin());

    Livewire::test(ProjectsIndex::class)
        ->assertSet('showForm', false)
        ->call('create')
        ->assertSet('showForm', true)
        ->assertSet('editingId', null)
        ->call('closeForm')
        ->assertSet('showForm', false);
});

test('admin can delete a project', function () {
    $this->actingAs(makeAdmin());

    $project = Project::create([
        'slug' => 'delete-me', 'name' => 'Delete Me', 'icon' => '📦', 'type' => 'Web App',
        'year' => 2024, 'featured' => false, 'summary' => null, 'description' => 'desc',
        'stack' => ['PHP'], 'images' => [['url' => 'https://example.com/shot.png', 'alt' => 'shot', 'main' => true]],
        'link' => null, 'order' => 0,
    ]);

    Livewire::test(ProjectsIndex::class)
        ->call('confirmDelete', $project->id)
        ->assertSet('confirmingDeleteId', $project->id)
        ->call('deleteProject');

    expect(Project::query()->find($project->id))->toBeNull();
});

test('submitting the contact form persists a message and sends mail', function () {
    Mail::fake();

    Livewire::test(ContactForm::class)
        ->set('name', 'Jane Doe')
        ->set('email', 'jane@example.com')
        ->set('subject', 'Hello')
        ->set('message', 'Test message body')
        ->call('submit');

    expect(ContactMessage::query()->where('email', 'jane@example.com')->exists())->toBeTrue();
    Mail::assertSent(App\Mail\ContactMessage::class);
});

test('admin can mark a message as read and delete it', function () {
    $this->actingAs(makeAdmin());

    $message = ContactMessage::create([
        'name' => 'Jane', 'email' => 'jane@example.com', 'subject' => 'Hi', 'message' => 'Body',
    ]);

    Livewire::test(MessagesIndex::class)->call('markAsRead', $message->id);
    expect($message->fresh()->read_at)->not->toBeNull();

    Livewire::test(MessagesIndex::class)
        ->call('confirmDelete', $message->id)
        ->call('deleteMessage');
    expect(ContactMessage::query()->find($message->id))->toBeNull();
});
