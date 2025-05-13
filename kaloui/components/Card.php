<?php
function kaloui($title, $body) {
    return "<div style='border:1px solid #ccc; padding:15px; border-radius:8px; max-width:300px;'>
        <h3>$title</h3>
        <p>$body</p>
    </div>";
}


class KaloCard {
    public static function render($title, $body) {
        return "<div class='card mt-3' style='width: 18rem;'>
            <div class='card-body'>
                <h5 class='card-title'>$title</h5>
                <p class='card-text'>$body</p>
            </div>
        </div>";
    }
}
