<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JournalIndex;
use Illuminate\Auth\Access\HandlesAuthorization;

class JournalIndexPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_journal::index');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JournalIndex $journalIndex): bool
    {
        return $user->can('view_journal::index');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_journal::index');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JournalIndex $journalIndex): bool
    {
        return $user->can('update_journal::index');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JournalIndex $journalIndex): bool
    {
        return $user->can('delete_journal::index');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_journal::index');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, JournalIndex $journalIndex): bool
    {
        return $user->can('force_delete_journal::index');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_journal::index');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, JournalIndex $journalIndex): bool
    {
        return $user->can('restore_journal::index');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_journal::index');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, JournalIndex $journalIndex): bool
    {
        return $user->can('replicate_journal::index');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_journal::index');
    }
}
