import './bootstrap';

// Import komponen-komponen Argon Dashboard
import './argon-dashboard-tailwind';
import './carousel';
import './charts';
import './dropdown';
import './fixed-plugin';
import './nav-pills';
import './navbar-collapse';
import './navbar-sticky';
import './perfect-scrollbar';
import './sidenav-burger';
import './tooltips';

// Import plugins
import './plugins/Chart.extension';
import './plugins/chartjs.min';
import './plugins/perfect-scrollbar.min';

import '@fortawesome/fontawesome-free/js/all.min.js';

import ApexCharts from 'apexcharts';
window.ApexCharts = ApexCharts;

// document.addEventListener('DOMContentLoaded', function() {
//     // Toggle submenu
//     document.querySelectorAll('a').forEach(item => {
//         if (item.nextElementSibling && item.nextElementSibling.tagName === 'UL') {
//             item.addEventListener('click', (e) => {
//                 e.preventDefault();
//                 const submenu = item.nextElementSibling;
//                 submenu.classList.toggle('hidden');
//                 item.querySelector('.fa-chevron-down').classList.toggle('rotate-180');
//             });
//         }
//     });
// });
