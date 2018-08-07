// import external dependencies
import 'jquery';

// Import everything from autoload
import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import singleVisual from './routes/single-visual';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  singleVisual,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());

// import then needed Font Awesome functionality
import { library, dom } from '@fortawesome/fontawesome-svg-core';
// import the Facebook and Twitter icons
import { faInstagram } from "@fortawesome/free-brands-svg-icons";
import { faBars, faTimes, faHome } from "@fortawesome/free-solid-svg-icons";

// add the imported icons to the library
library.add( faInstagram, faBars, faTimes, faHome );
// tell FontAwesome to watch the DOM and add the SVGs when it detects icon markup
dom.watch();

