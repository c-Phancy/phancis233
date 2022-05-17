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
