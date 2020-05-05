require('./bootstrap');

import 'alpinejs'
import Toasted from 'toastedjs'

window.toasted = new Toasted({  
	position : 'bottom-left',
	theme: 'alive',
	duration: 3000
});

console.log(window.toasted);