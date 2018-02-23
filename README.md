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
npm run dev
```

Which should open up your web browser with the documentation. As you make edits, just reload the page and your edits should build automatically.

## Common Issues

If you run `npm run dev` and encounter any kind of permission denied issue on any particular files, just make sure they are properly set as executables with:

```
chmod 771 _<FILES THAT DONT EXECUTE>_
```

I have seen this happen a few times, so just look out for it 🙃
