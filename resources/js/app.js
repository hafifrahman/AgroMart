import './bootstrap';
import './dashboard';
import './product';
import './theme-toggle';

Livewire.on('error', (event) => {
    alert(event.message);
});
