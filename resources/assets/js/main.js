import $ from 'jquery';
window.$ = window.jQuery = $;

import 'slick-carousel'
import sliders from './components/slider';

document.addEventListener('DOMContentLoaded', () => {
    sliders();
})

