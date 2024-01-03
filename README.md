# CaseAce Frontend

This is frontend of CaseAce, a management system for Law Firm. We built this using native HTML, with a bit of help of PHP includes to minimize copy pasting codes.

## Get Started

1. Install XAMPP or PHP on your machine
2. Run PHP
3. Pull/Clone the git repo, the frontend and the backend.
4. Start backend server.
5. CD into your directory that keeps this project.
6. Run `php -S localhost:3000` to start PHP server.
7. IF XAMPP is used, simply run the `Apache`. Ensure that the directory in XAMPP is set to correct path. Note! `XAMPP` used `C:/xampp/htdocs/`as defaults, consider moving your project to that path or modify the path in the config file of`XAMPP APACHE`.
8. Go to `localhost:3000` in browser.
9. Login


## Notes when developing FE

### How to start develop FE

1. Get the `.env` file
2. Create a file `/env` in this project folder
3. Run `npm i` to install packages
4. Run `npm start` to start server

### Steps to develop a new feature

1. Checkout to main branch:`git checkout main`
2. Checkout to new branch according to naming convention: `git chekcout -b  <branchname: username/featureName`, for example: `git checkout -b weiqi/login`
3. Write some code
4. Check modified files: `git status`
5. Add neccessary files to push: `git add .` (to add all modified files) or `git add <files separated by space>` (to add selected files: `git add "login.css" "login.html" "code/invalid.html"`)
6. Commit the changes: `git commit -m <commit message>`. Commit message starts with a verb: `git commit -m "Add Login page and Css"`
7. Push to GitHub: `git push -u origin <branch name>`
8. Make a pull request in GitHub. (Note: only do this once each branch/feature)
