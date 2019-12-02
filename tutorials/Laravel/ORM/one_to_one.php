One To One
<?php
----(users)-----
id  | name | email | password | create_at | updated_at

------(user_profile)------
id | user_id | address | photo


# hasOne function
User model would look like this:

class User extends Model
{
    function profile() {
        return $this->hasOne(UserProfile::class); //App\UserProfile
		//For example, if you had a field users.user_id and then user_profiles.profile_user_id, relationship would look like this:
		//return $this->hasOne(UserProfile::class, 'profile_user_id', 'user_id');
		
    }
}


With our relationship defined, we can use it like this.
Here’s our Controller:

class ProfileController extends Controller
{
    public function index($user_id)
    {
        $user = User::find($user_id);
        return view('profile', compact('user'));
    }
}

Then in our profile.blade.php view file we can use something like this:

Address: {{ $user->profile->address }}

# belongsTo function
On the other hand, we may also have a relationship from UserProfile to User model, a reverse from hasOne. This one is called belongsTo.

class UserProfile extends Model
{
    function user() {
        return $this->belongsTo('App\User');
    }
}

{{ $profile->user->email }}

# Create and delete
For example, a usual way how you would store a UserProfile entry:

$user = User::find(1);
$profile = new UserProfile;
$profile->user_id = $user->id;
$profile->address = "Some address in New York";
$profile->save();

But there’s a shorter way to attach a profile to the user – there’s no need to define user_id field manually.

$user = User::find(1);
$profile = new UserProfile;
$profile->address = "Some address in New York";
$user->profile()->save($profile);

You can also delete related relationship entry:

$user = User::find(1);
$user->profile()->delete();

# Retrieve Records

// Get User Profile
User::find(1) -> profile;
// Get Profile User 
Profile::find(1) -> user;





?>