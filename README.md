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