import './bootstrap';
import './sidebar';
import './dashboard';
import './product';
import './theme-toggle';

Livewire.on('error', (event) => {
    alert(event.message);
});
