CRUD Review Assignment
Objectives

Review what was learned in CIS 230 as a basis for this quarter. Structure your Laravel applications into a Model-View-Controller architecture using RESTful routes that allow your codebase to grow in a meaningful and organized way. Your application will leverage Laravel's built-in facilitations for controllers, Eloquent Model, and Blade views so that you know where to put your code. Furthermore, how to generate enough data to work with in a meaningful way.

Specifications

Upgrade your local Laravel installation to version 9
Generate a new Laravel application named: <lastname>App, ie. blakeApp
Create a functional CRUD application around an entity called: profile.
A profile with consist of these fields:
first name
last name
email
phone number
Be sure to handle migration, model, and seeding (use faker)
Create the resourceful route and controller to handle the different types of CRUD actions
Also includes validation
Create templates necessary to list, show, create, update, and edit profiles
Assure profiles are paginated on the list page
Assure a form template is shared between the create and edit pages
Assure forms are repopulated when data is invalid with helpful error messages
Use a UI framework, ie. Bootstrap to assure pages look consistent and are responsive
Use a layout file to share common look and feel
Allow a user to delete a profile (with confirmation dialog)
Submission

Create a new Github repository named: <lastname>cis233, ie. blakecis233
add/invite me as a collaborator
Add your laravel application to the repository
Create a Pull Request and add me as a reviewer

---

Basic Table Relationships Assignment
Objectives

Get familiar with relating multiple tables together using Eloquent Model.

Specifications

Create a branch called basic-table-relationships
Write the migrations and Eloquent Model code necessary for these items
Setup a User has_one Profile relationship and also the inverse
Setup a Profile has_many Handle (use fields that I did in my lecture) relationship and also inverse
On the profile show page - list the handle information for the profile (make it look better than what I did in my lecture :) )
if no handles then show a message saying so
Update your Profile seed to generate users with profiles and profiles with handles.
Some profiles should not have handles (to test your view logic)
This may be the more complicated part of the assignment as you should be able to run this over and over without polluting your data and also dynamically associate the records together.
Remember to delete all users, profiles, and handles before you run the seed

Submission

Push branch to Github
Create a Pull Request and request me as a reviewer

---

Writing Seeds Assignment
Fix the seeds from your last assignment. Make sure you verify in Tinker that they work.

$user = $someHandle->profile->user;

$user->profile

$user->profile->handles

-   If you already implemented seeds correctly then you have nothing to do and will receive full credit on this assignment.

Extra Credit (15 points):

Write or rewrite your seeds using factories.

https://laravel.com/docs/9.x/seeding#using-model-factories (Links to an external site.)

This is extra credit so not required. You must do your own research to implement.

-   If you already implemented seed factories in your previous assignment then you will receive extra credit on this assignment.

Submission

Feel free to update branch/PR from last assignment. Re-request me as a reviewer.

---

Many to Many Assignment
Objectives

Get familiar with relating multiple tables together using Eloquent Model.

Specifications

You've watched my lecture as well as the suggested Youtube lectures covering many to many table relationships.
Make sure you create commits along the way as you successfully progress through the bulleted items
Assuming your main branch is up-to-date
From the main branch, git merge basic-table-relationships, if you haven't already
Create a branch called many-to-many-assignment
Write the migrations and Eloquent Model code necessary for these items
Add a group entity: Eloquent Model Group class, migration for groups table with these fields: id, name, timestamps
A group represents a social group as you might see on meetup.com. Feel free to use some of those as examples or make up your own,
Setup a profile has_many groups relationship and also the inverse has many relationship
Remember, you'll need a join table - so need a migration for this too
Update your seeds to generate groups and profiles associations
Some profiles should not have groups (to test your view logic)
On the profile show page: list the groups (just name is fine) associated to that profile.
if no groups then show a message saying so
Create a new resourceful route, controller, and necessary blade templates (index and show) for groups
index page
list all the groups
each group should have a link to show page
groups should be paginated (seed enough groups to demonstrate this)
show page
Display group name
list profiles that are part of the group
each profile listed should provide a link to view profile details (profile show page)
if group has no profiles then display a message that there are no profiles in group yet
Submission

Push branch to Github
Create a Pull Request and request me as a reviewer

---

Authentication Assignment
Objectives

Incorporate authentication into your Laravel application
Understand how password encryption works
Leveraging layouts to share navigation

Specifications

Many-to-many updates (if applicable)
Using feedback from last assignment:
Work in existing branch: many-to-many-assignment
Make updates and fixes from feedback given
Once you feel good about it then you can merge back into the main branch
Make sure I can run `php artisan db:seed` over and over. I should have good data every time.
Authentication
You've watched authentication lectures
Assuming your main branch is up to date, create a branch called: authentication-assignment
Install and setup Laravel Breeze
Assure the profiles and groups resources require authentication to access
Update layouts so that all profiles and groups views use the layout that is offered by Breeze.
You have some liberty here to customize the layout CSS, IF you have time. Otherwise, just use the defaults from Breeze.
Make sure there are links to /profiles and /groups in the navigation
For the logged in user, put a link to their profile in the upper-right hand drop down menu.

Submission

Push branch to Github
Create a Pull Request and request me as a reviewer

---

Livewire Assignment
Objectives
Understand JavaScript ecosystem
Livewire basics
Write interactive, SPA-like applications writing minimal/no JavaScript
Giving users better experiences
Requirements
Watch all provided Livewire lectures
Create new git branch: livewire-assignment
All functionality must be Livewire-driven! 
Using Livewire components only (not Controllers)
Create a new Livewire route and Livewire component and view for profiles
You will display a table of all profiles
Show fields: first name, last name, email, phone number
No Create/Add, Edit, or Delete functionality
One search text field that will be used to search subtext in first name or last name
Sorting - provide ascending and descending sort on first name, last name, and email
Pagination
Research how to do pagination in Livewire 
Paginated links above and below profiles
default to 10 profiles per page
provide a dropdown select list that lets user select how many profiles to show per page: 10, 25, 50, All
You may need to seed more profiles to test this functionality
Submission

Push branch to Github
Create a Pull Request
Request kblake as a reviewer
 

Extra Credit Opportunities
You can select one or more of these items. It's not all or nothing. So do what you can! When submitting, let me know which extra credit items to look for. 

Using Livewire only:

Add Create profile functionality
Add Edit profile functionality
Add Delete profile functionality