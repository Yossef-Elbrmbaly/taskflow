<?php

namespace App\Livewire;

use Livewire\Component;

class Pomodoro extends Component
{
    public string $mode        = 'focus';
    public int    $secondsLeft = 1500;
    public int    $totalSeconds= 1500;
    public bool   $isRunning   = false;
    public bool   $showSettings= false;

    // Settings
    public int $focusMins      = 25;
    public int $shortBreakMins = 5;
    public int $longBreakMins  = 10;

    public function mount(): void
    {
        $this->syncDurations();
    }

    private function syncDurations(): void
    {
        $this->totalSeconds = match ($this->mode) {
            'short_break' => $this->shortBreakMins * 60,
            'long_break'  => $this->longBreakMins  * 60,
            default       => $this->focusMins       * 60,
        };
        $this->secondsLeft = $this->totalSeconds;
    }

    // يتكلم كل ثانية لما التايمر شغال
    public function tick(): void
    {
        if (!$this->isRunning || $this->secondsLeft <= 0) return;

        $this->secondsLeft--;

        if ($this->secondsLeft === 0) {
            $this->isRunning = false;
        }
    }

    public function toggleTimer(): void
    {
        $this->isRunning = !$this->isRunning;
    }

    public function resetTimer(): void
    {
        $this->isRunning = false;
        $this->syncDurations();
    }

    public function switchMode(string $mode): void
    {
        $this->mode      = $mode;
        $this->isRunning = false;
        $this->syncDurations();
    }

    public function saveSettings(): void
    {
        $this->validate([
            'focusMins'      => 'required|integer|min:1|max:120',
            'shortBreakMins' => 'required|integer|min:1|max:60',
            'longBreakMins'  => 'required|integer|min:1|max:60',
        ]);

        $this->showSettings = false;
        $this->syncDurations();
    }

    public function render()
    {
        $progress = $this->totalSeconds > 0
            ? $this->secondsLeft / $this->totalSeconds
            : 0;

        $formattedTime = sprintf(
            '%02d:%02d',
            floor($this->secondsLeft / 60),
            $this->secondsLeft % 60
        );

        return view('livewire.pomodoro', compact('progress', 'formattedTime'));
    }
}
