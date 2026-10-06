<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TicketPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'technicien', 'employe']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Ticket $ticket): bool
    {
        if ($user->role === 'admin') {
            return true; // Admin can view any ticket
        }

        if ($user->role === 'employe') {
            return $ticket->user_id === $user->id; // Employe can view tickets they created
        }

        if ($user->role === 'technicien') {
            return $ticket->assigned_to === $user->id; // Technicien can view tickets assigned to them
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'employe']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Ticket $ticket): bool
    {
        if ($user->role === 'admin') {
            return true; // Admin can update any ticket
        }

        if ($user->role === 'employe') {
            return $ticket->user_id === $user->id && $ticket->status === 'nouveau'; // Employe can update tickets they created
        }

        if ($user->role === 'technicien') {
            return $ticket->assigned_to === $user->id; // Technicien can update tickets assigned to them
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ticket $ticket): bool
    {
        if ($user->role === 'admin') {
            return true; // Admin can delete any ticket
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Ticket $ticket): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Ticket $ticket): bool
    {
        return false;
    }
}
