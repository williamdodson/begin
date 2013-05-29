# Begin
## A Completely Naked WordPress Theme

**Begin is a completely naked WordPress theme that makes very few markup assumptions aside from an HTML5 doctype.** Start your own theme from scratch without extraneous markup getting in your way.

***

## Background

I started developing WordPress sites about 10 years ago. Over the years I developed a routine for creating custom themes for my clients from scratch by simply overwriting the Kubrick or Default theme with my own markup and preferences. Needless to say, this was cumbersome and occasionally I would miss modifying a template only to have it "break" in production on the live site (which is never, ever a good thing to have happen).

While most of the client sites I build in WordPress are completely custom—often judiciously using [Custom Post Types](http://codex.wordpress.org/Post_Types#Custom_Post_Types) and accompanying templates—there are some similarities between them all that I have (hopefully) codified into what we have here with **Begin**.

**Begin** is a bare-bones theme that uses an HTML5 doctype. I use this theme as a starting point for my own custom theme development. Some caveats are worth noting here:

* **Begin** doesn't use any CSS code or resets. I prefer to write my own CSS for each project anyway. **If you're looking for an out-of-the-box theme design this theme is not for you.**
* **Begin** doesn't use the recent WordPress ``get_template_part()`` style of templating—this is left as an exercise to the theme developer to implement as needed.
* **Begin** uses both a global ``<header>`` and ``<footer>`` element (which you can use as-is or modify as needed).
* **Begin** doesn't wrap the main content inside of a container tag.
* **Begin** uses the HTML5 heading structure—both the site and the page title are level one headings (``<h1>``) with sub-headings following in semantic order after the page title.
* **Begin** uses an ``<aside>`` element for the sidebar (which you can also use as-is or modify as needed).

***

## Installation

You can install this theme in a few different ways. Choose the one that fits best for your project:

1. Download the ZIP file and unpack the contents to your ``/wp-content/themes`` folder (you can rename the folder to whatever you like).
2. Clone this project from GitHub into your ``/wp-content/themes`` folder (e.g. ``git clone git://github.com/obxdesignworks/begin.git``).
3. Fork this project and customize to your heart's content.

Once installed remember to open up the ``/wp-content/themes/begin/style.css`` file and edit the theme header info. Enjoy!

***

## License

**No license here. Carry on, chop chop!** Seriously though, while I do claim developer rights on the original **Begin** theme (as in "I made this"), once you download it or whatnot it's yours. It's meant as an easy way for me to get started on a WordPress custom theme and I hope you find it useful too. Cheers!