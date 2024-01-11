import { PowerGlitch } from "powerglitch"

PowerGlitch.glitch('#rasberry', {
    "timing": {
        "duration": 500,
        "iterations": 1
    },
    "glitchTimeSpan": false,
    "shake": {
        "amplitudeX": 0.01,
        "amplitudeY": 0.01
    },
    "slice": {
        "count": 20,
        "velocity": 25,
        "minHeight": 0.005,
        "maxHeight": 0.005,
        "hueRotate": false
    }
})