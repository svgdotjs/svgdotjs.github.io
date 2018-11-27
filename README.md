# KDoc Kirby Theme
Documentation website theme for [Kirby CMS](http://getkirby.com).

Check out a demo of it, and learn more about how it works here:
https://natesteiner.com/kdoc/

![KDoc Screenshot](kdoc-screenshot.png)

## Setting Up

To run the documentation server, just run:

```
npm install
```

Get a coffee ☕️, Then follow it up with:

```
npm run serve -s
```

Which should open up your web browser with the documentation. As you make edits, just reload the page and your edits should build automatically.


## Writing Docs

You can write the docs by either modifying the content page directly, or by using the built in documentation editor at [localhost:8030/panel](http://localhost:8030/panel). This is the recommended method as it supports markdown and kirbytext.

To login just use:

    username: svgjs
    password: svgjs

(Kirby requires a login since it's a CMS).


## Building

To build the docs, navigate to [localhost:8030/statify.php](localhost:8030/statify.php), which will build the static files and **output a `/static` folder**, by pushing the contents of static to master, the docs will update automagically on the site.

Note that you must be a core collaborator to make these changes, if you would like to submit a pull request, please do so and we will update the docs on our end.


## Common Issues

If you run `npm run serve -s` and encounter any kind of permission denied issue on any particular files, just try deleting your node_modules folder and running npm install again. I have seen this happen a few times, so just look out for it 🙃. Its a permission issue that you can fix by just upgrading to a new version.
