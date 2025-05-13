<?php
class KaloAlert {
    private $title;
    private $description;
    private $type;
    private $autoClose;
    private $duration;
    private $id;

    private $validTypes = [
        "success", "error", "info", "warning", "primary", "light", "dark",
        "danger", "confirm-success", "notification", "custom"
    ];

    public function __construct($title, $description, $type = "info", $autoClose = false, $duration = 5000) {
        $this->title = $title;
        $this->description = $description;
        $this->type = in_array($type, $this->validTypes) ? $type : "info";
        $this->autoClose = $autoClose;
        $this->duration = $duration;
        $this->id = uniqid('kaloalert_');
    }

    public function render() {
        $class = "kalo-alert kalo-alert-{$this->type} gsap-anim";
        $autoCloseScript = $this->autoClose
            ? "<script>setTimeout(() => { const el = document.getElementById('{$this->id}'); if (el) el.classList.add('hide-alert'); }, {$this->duration});</script>"
            : "";

        return <<<HTML
<div id="{$this->id}" class="{$class}">
    <div class="kalo-alert-header">
        <strong>{$this->title}</strong>
        <span class="kalo-alert-close">&times;</span>
    </div>
    <div class="kalo-alert-description">{$this->description}</div>
</div>
{$autoCloseScript}
HTML;
    }
}
?>
