import { PowerGlitch } from "powerglitch"

PowerGlitch.glitch('#rasberry', {
    "hideOverflow": true,
    "timing": {
        "duration": 1000,
        "iterations": 1,
        "easing": "ease-out"
    },
    "glitchTimeSpan": {
        "end": 1
    },
    "shake": {
        "velocity": 20,
        "amplitudeX": 0.05,
        "amplitudeY": 0.05
    },
    "slice": {
        "count": 12
    }
})