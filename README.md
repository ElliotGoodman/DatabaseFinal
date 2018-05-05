# FINAL PROJECT FOR CS2830 AND CS3380

### Written by AARYN JOHNS, ELLIOT GOODMAN, and ANDREW KRALL

##### Aaryn Johns is a current student of both CS2830 and CS3380. 
##### Elliot Goodman is a current student of CS3380.
##### Andrew Krall (not in CS3380 currently) has taken both courses prior to the spring semester of 2018.

#### Both Professors Wergeles and Musser agreed to allow Johns and Goodman to collaborate on this project, and for Krall to join the group as well.

---
## OVERVIEW

* This webpage is a searchable database of songs by either genre of music or "mood."
* The site is hosted on [infinityfree.net](https://infinityfree.net) by Elliot Goodman
* [From the main index page,](https://naganadel.epizy.com/MoodBoard_index.php) any visitor of our site can search from the database and display a table populated by their search criteria from the MySQL database.
* In order to update records or delete from the database, one must [login](https://naganadel.epizy.com/login.php) with the username "test" and password "pass." The link to login is found in the footer of the page. These login credentials are stored in a table with the password encrypted by sha1() to ensure security. If any other username or password are attempted, an error is returned on-screen.
* Upon accurate login, users are redirected to [the Update/Deletion page](https://naganadel.epizy.com/UpdateScreen2(Centered).php) where users can alter records or delete them permanently from the database. NOTE: Those who attempt to access the Update/Deletion without having logged in will be redirected to the login page.
* Login status is maintained by a $_SESSION variable determined upon first access of the website. Once a user has logged into the site, that user can click between pages while still logged in, and can logout at any time from any page by clicking [Logout](https://naganadel.epizy.com/logout.php) found in the dynamically updated footer.
* A link in the footer to a [Meet the Creators](https://naganadel.epizy.com/MTC.php) page features bios of Johns, Goodman, and Krall respectively. Each bio is dynamically updated by an external updateInfo.php page based on whose bio the user clicks on.
* The footer throughout the website is dynamically maintained by an external footer.php file supported by Bootstrap functionality. There are three possible links displayed in the footer. Link 1 always links to the Meet the Creators page, except on the Meet the Creators page. Link 2 is conditional. If the $_SESSION says the user is logged in, AND that the URL currently loaded is the index page, Link 2 displays a link to Update. If the user is logged in and the user is NOT on the index page, Link 2 displays a Back to Home link. IF THE USER IS NOT LOGGED IN, *and* the user is on the Login page, Link 2 displays a Back to Home link. Link 3 is also conditional. If the user is logged in, Link 3 is a logout link. If not, it's a login link.

---
## CS3380 Final Project Requirements

* Develop a database-driven project in any programming language(s) for any platform(s)
    * This project is entirely database-driven, Creating records in a MySQL DB, Reading them, Updating them, and Deleting them. We wrote this website in HTML5, CSS3, JavaScript, jQuery, PHP, and Bootstrap.
* Utilizes more than one table
    * Three tables are used: mainTable, moods, and user
* The tables must be normalized
    * The tables are normalized as possible (Elliot Goodman set up mainTable and moods)
* Implements full CRUD (Create, Read, Update, and Delete) with at least some of the data
    * Users can Read and Create from the [main index](https://naganadel.epizy.com/MoodBoard_index.php)
    * Users can Update and Delete from the [Update/Delete page](https://naganadel.epizy.com/UpdateScreen2(Centered).php)
    * Users can add records of songs, search and read from records, update them, and delete them.
* Serves a purpose and is not trivial
    * The purpose of our website is to provide a functional database of songs categorized by both subjective and objective traits.
* The project must be team-based. Teams are to be comprised of 2 to 6 students.
    * Our team is three people: Johns, Goodman, and Krall.
* The project must be managed using Git and is to be placed on GitHub.
    * Elliot Goodman hosted [the Git repository](https://github.com/ElliotGoodman/DatabaseFinal) and shared access with Andrew Krall and Aaryn Johns.
* A README.md file in the repository is to be a home page for supporting documentation
    * Team members: Andrew Krall, Elliot Goodman, and Aaryn Johns
    * See OVERVIEW for a description of the application
    * Schemas of each table:
        * [Schema for mainTable](http://naganadel.epizy.com/images/mainTable.png)
        * [Schema for mood](http://naganadel.epizy.com/images/moods.png)
        * [Schema for user](http://naganadel.epizy.com/images/user.png)
    * An ERD for the Database:
        * [ER Diagram for MoodBoard](http://naganadel.epizy.com/images/ERD.png)
    * How MoodBoard CRUD's
        * Any visitor of our webpage can search the database by genre and/or mood. Searches populate a table of the songs that match the search criteria. In this way, visitors READ from the database.
        * Any visitor of our webpage can add to the database by typing out the title, artist, genre, and mood of a song with the option of including a YouTube link as well. In this way, visitors CREATE records in the database.
        * Visitors who login to our webpage have access to a page where they may UPDATE or DELETE records from the Database.
    * A screencapture of our webpage in action:
<!--        * [![IMAGE ALT TEXT HERE](http://img.youtube.com/vi/YOUTUBE_VIDEO_ID_HERE/0.jpg)](http://www.youtube.com/watch?v=YOUTUBE_VIDEO_ID_HERE)-->

---
## CS2830 Final Project Requirements

1. The web application must use HTML5 and CSS3 for page content and layout
    * All pages are formatted using HTML5 specifications. No tables are used for general content layout, and are only used for tabular information on [the index page](https://naganadel.epizy.com/MoodBoard_index.php) and [the update page](https://naganadel.epizy.com/UpdateScreen2(Centered).php). CSS is used to style content and laying out the pages. Each page uses HTML5 and has the five required tags.
2. The pages/sections that make up the web application must have a consistent design/interface. The web application must be logically organized.
    * All pages share common formatting, with identically styled header tags, and a dynamic external footer. Elements of each page are styled identically. The webpage flows naturally from link to link thanks to an external dynamic footer.
3. The web application must have content or functions that are publicly available and content or functions that can only be accessed if authenticated (logged in). When a user is logged in they must have some visual cue that indicates they are logged in. The ability to log out must be available. After the user logs out or if they never log in, they must not be able to access the protected pages or functions.
    * The page for updating and deleting is password and log-in protected. Any visitor who attempts to access that page and is not logged in will be redirected to the login page. When a user is logged in, instead of the footer displaying a Log In link, it displays a Log Out link. If someone logs out, they see a log in link and cannot access protected content.
4. The username and password to access protected content is "test" and "pass" respectively.
    * "test" and "pass" are the credentials necessary to access protected content on our webpage.
5. The webpage must utilize PHP and proper PHP techniques
    * We used plenty of PHP and proper PHP techniques
6. You must use GET and POST
    * GET is used on [the index page](https://naganadel.epizy.com/MoodBoard_index.php) in order to search the database.
    * POST is used on [the page for adding songs](https://naganadel.epizy.com/AddSong.php), [and the page for Updating and Deleting songs](https://naganadel.epizy.com/UpdateScreen2(Centered).php) when altering the database.
7. The web application must use form elements beyond what is needed for a login form.
    * We used forms to search the Database, Add to the database, and Update from and delete from the database.
8. Any place where users can provide input must supply appropriate and informative feedback if the information entered is not complete or correct.
    * When adding to the database, if information is not entered that is required, they are alerted. If information entered does not fit the criteria for valid text entry, they are alerted. When attempting to login, if the user does not enter the correct credentials, they are barred entry from the protected page with an alert that tells them they didn't type in the correct credentials.
9. The web application must contain a page where there are multiple photos presented on the page.
    * Our [Meet The Creators](https://naganadel.epizy.com/MTC.php) page contains multiple images, one for each group member. 
10. The web application must contain a page that contains a YouTube or another video embedded in the page.
    * When viewing searches of the database, songs inserted with YouTube links feature embeds of the linked video.
11. The web application must utilize JavaScript and proper JavaScript techniques as shown in class.
    * Javascript is used on the [Meet the Creators](https://naganadel.epizy.com/MTC.php) to call an AJAX request on updateInfo.php
12. The web application must utilize jQuery and proper jQuery techniques as shown in class.
    * jQuery is used on the [login page](https://naganadel.epizy.com/login_form.php) to transform the submit input into a button.
13. The web application must utilize jQuery UI or Bootstrap interface elements.
    * jQuery UI is used on the [login page](https://naganadel.epizy.com/login_form.php) to transform the submit input into a button.
    * Bootstrap was used for formatting some buttons, but also for the footer at the foot of each webpage.
14. The web application must utilize AJAX.
    * Javascript is used on the [Meet the Creators](https://naganadel.epizy.com/MTC.php) to call an AJAX request on updateInfo.php
15. The web application is not to be trivial in simply meeting the technical requirements. You are to build a web application that has a purpose and delivers functionalities and capabilities.
    * The purpose of our website is to provide a functional database of songs categorized by both subjective and objective traits.
16. A document is to be written that provides a link to the web application and describes how you met the criteria.
    * This document is that document required.
    
---
### WHO DID WHAT

#### Elliot Goodman:
* Set up the DNS with the MySQL database and established the schemas for mainTable and moods.
* Hosted the GitHub respository
* Designed basic HTML layout of the Mood Board, Add Song, and Update/Delete pages
* Created and bug-checked the song searching/adding/updating/deleting text fields and their patterns, dropdown menus, and buttons.
* Structured and wrote the PHP and SQL for searching, adding, and updating songs.
* Wrote all the code related to displaying data in tables, with exception to embedding the Youtube videos in said tables 
* Added hyperlinks between the Mood Board and Add Song pages.
* Alphabetized the expanded lists of genres and moods populated by Aaryn Johns

#### Aaryn Johns:
* Set up the MySQL table to contain the log in credentials
* Set up login/logout functionality
* Protected the update/delete functionality
* Created the Meet the Creators page and the AJAX request to populate the biographies.
* Fixed/improved CSS layouts 
* Added real_escape_string()'s to the input returns before SQL insertion.
* Added the dynamic external footer that links pages to each other
* Made it so that YouTube links included in a song record insert into the table as iFrame tags that enable embed functionality.
* Wrote this README.md file
* Made the ER Diagram
* Took screen capture of the web application as evidence that it works.
* Expanded the lists of genres and moods

#### Andrew Krall
* Aided Elliot in understanding PHP syntax and structure
* Wrote the PHP for deletion
* Aided in bug-checking
* Introduced Bootstrap to the project