import './bootstrap';

import Alpine from 'alpinejs';
import { initTheme, toggleTheme } from './theme';

window.Alpine = Alpine;

Alpine.start();

// RUN AFTER DOM READY
window.toggleTheme = toggleTheme;
document.addEventListener('DOMContentLoaded', () => {
    initTheme();
});
