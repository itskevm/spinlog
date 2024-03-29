SpinLog
===========

Description
------------
SpinLog is designed to hold driving data. It takes information and displays it in a table to the user.

 
#### History
This is where versions will be documented.

## Changelog
### [0.0.8] - 2022-09-17

#### Changed

- More logic to driving detail by range

#### Fixed

- Floating links that pointed to the wrong path

### [0.0.7] - 2021-10-24

#### Added

- Trip details by range page
- Aforementioned page included details on number of trips, days, total distance driven, and more based on two dates specified by user
- Third box to home page to access this page

#### Changed

- Moved "Enter a trip" button to the top of the long 'view' page

#### Fixed

- Rearranged Div layout on 'view' page to handle future buttons

### [0.0.6] - 2021-05-22

#### Fixed

- Remove function was updated to use the right "GET" value

### [0.0.5] - 2021-04-19

#### Added

- Past entries can now be deleted
- Media queries for mobile and larger devices are now implemented
- Proper Icon for browser tab

### [0.0.4] - 2020-08-24

#### Added

- Units option now send a boolean (no longer hard coded FALSE)
- PHP loads the last 3 recent trips on the main page
- imgur upload of the new icon (implemented only on View page)

#### Changed

- Colour scheme based on: https://i.pinimg.com/564x/17/eb/37/17eb373a691b570854bcfd7301737029.jpg
- Units option renamed to metrico
- Delete button reworked to match form and not 'submit' twice
- Delete confirmation message bug fixed
- Database connection message edited

### [0.0.3] - 2020-08-23

#### Changed

- View page's delete button is now a form that submits POST data
- Record page for any direct visits
- Delete page for any direct visits

### [0.0.2] - 2020-08-16

#### Added

- Postgres db connection on prod
- Local db support
- Main page logo
- Created two tables in database
- Basic working Add, View, Delete
- Updated gitignore for assets

### [0.0.1] - 2020-08-12

#### Added

- Main index file and readme
- All basic files and assets