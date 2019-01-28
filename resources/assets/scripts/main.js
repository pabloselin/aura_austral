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
import singleEdiciones from './routes/single-ediciones';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  singleVisual,
  singleEdiciones,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());

// import then needed Font Awesome functionality
import { library, dom } from '@fortawesome/fontawesome-svg-core';
// import the Facebook and Twitter icons
import { faInstagram, faFacebook } from "@fortawesome/free-brands-svg-icons";
import { faBars, faTimes, faHome, faEnvelope, faTimesCircle, faProjectDiagram, faPlus } from "@fortawesome/free-solid-svg-icons";
import { faCircle } from "@fortawesome/free-regular-svg-icons";

// add the imported icons to the library
library.add( faInstagram, faBars, faTimes, faHome, faFacebook, faEnvelope, faTimesCircle, faProjectDiagram, faCircle, faPlus );
// tell FontAwesome to watch the DOM and add the SVGs when it detects icon markup
dom.watch();

