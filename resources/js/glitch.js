import { PowerGlitch } from "powerglitch"

PowerGlitch.glitch('#rasberry', {
    "timing": {
        "duration": 750,
        "iterations": 1
    },
    "glitchTimeSpan": false,
    "shake": {
        "amplitudeX": 0.005,
        "amplitudeY": 0.005
    },
    "slice": {
        "count": 20,
        "velocity": 50,
        "minHeight": 0.005,
        "maxHeight": 0.003,
        "hueRotate": false
    }
})