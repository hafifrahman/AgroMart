import './bootstrap';
import './header';
import './sidebar';
import './dashboard';
import './product-detail';
import './theme-toggle';

Livewire.on('error', (event) => {
    alert(event.message);
});
