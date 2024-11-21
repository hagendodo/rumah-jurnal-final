<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JournalAccreditation;
use Illuminate\Auth\Access\HandlesAuthorization;

class JournalAccreditationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_journal::accreditation');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JournalAccreditation $journalAccreditation): bool
    {
        return $user->can('view_journal::accreditation');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_journal::accreditation');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JournalAccreditation $journalAccreditation): bool
    {
        return $user->can('update_journal::accreditation');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JournalAccreditation $journalAccreditation): bool
    {
        return $user->can('delete_journal::accreditation');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_journal::accreditation');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, JournalAccreditation $journalAccreditation): bool
    {
        return $user->can('force_delete_journal::accreditation');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_journal::accreditation');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, JournalAccreditation $journalAccreditation): bool
    {
        return $user->can('restore_journal::accreditation');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_journal::accreditation');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, JournalAccreditation $journalAccreditation): bool
    {
        return $user->can('replicate_journal::accreditation');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_journal::accreditation');
    }
}
