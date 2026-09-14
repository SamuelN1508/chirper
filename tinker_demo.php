<?php

use App\Models\Chirp;
use App\Models\User;

// Get or create a user
$user = User::first();
if (!$user) {
    $user = User::create(['name' => 'Test User', 'email' => 'test@example.com', 'password' => bcrypt('password')]);
}

echo "=== Get all chirps ===" . PHP_EOL;
dump(Chirp::all()->toArray());

echo "=== Get chirp by ID ===" . PHP_EOL;
dump(Chirp::find(1));

echo "=== Search chirps (containing 'Laravel') ===" . PHP_EOL;
dump(Chirp::where('message', 'like', '%Laravel%')->first());

echo "=== Count chirps ===" . PHP_EOL;
dump(Chirp::count());

echo "=== User's chirps ===" . PHP_EOL;
dump($user->chirps->toArray());

echo "=== Create a chirp ===" . PHP_EOL;
$chirp = $user->chirps()->create(['message' => 'Hello!']);
dump($chirp->toArray());

echo "=== Update the chirp ===" . PHP_EOL;
$chirp->update(['message' => 'Updated message']);
dump($chirp->fresh()->toArray());

echo "=== Delete the chirp ===" . PHP_EOL;
$chirp->delete();
echo "Deleted! Remaining count: " . Chirp::count() . PHP_EOL;
