import { PowerGlitch } from "powerglitch"

PowerGlitch.glitch('#rasberry', {
    "timing": {
        "duration": 1000,
        "iterations": 1,
        "easing": "ease-out"
    },
    "glitchTimeSpan": false,
    "shake": {
        "amplitudeX": 0.004,
        "amplitudeY": 0.004
    },
    "slice": {
        "count": 10,
        "velocity": 20,
        "minHeight": 0.005,
        "maxHeight": 0.004,
        "hueRotate": true
    }
})