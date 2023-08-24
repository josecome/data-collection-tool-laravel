# Data Collection Tool
This project aim to demostrate how Data Collection Tool webpage can be developed using PHP + Laravel.

Home page has list of all projects created: Deployed, Draft or Archived. Also has button to create new project.
<img src="public/home.jpg">

To create new project, click button 'New Project' and fill the form
<img src="public/create_project.jpg">

After form is created, you can add columns to the project (form)
<img src="public/display_project.jpg">

After add columns you can preview the form
<img src="public/preview_form.jpg">

If everything is ok, you can deploy project by click on button 'Deploy'. Click the link provided above to find link to share for filling form.
<img src="public/get_link.jpg">
The link provided will display the form
<img src="public/deployed_form.jpg">

## To run the project

Type in commandline
### `php artisan migrate`

### `php artisan serve`

Server will be running on [http://127.0.0.1:8000]
