import { PowerGlitch } from "powerglitch"

window.onload = async () => {
    await document.querySelector('#rasberry_img').classList.add('animate-glitch');
    await document.querySelector('#presentation').classList.add('animate-zoom-avatar');

    PowerGlitch.glitch('#rasberry', {
        "timing": {
            "duration": 1000,
            "iterations": 1
        },
        "glitchTimeSpan": false,
        "shake": {
            "amplitudeX": 0.004,
            "amplitudeY": 0.004
        },
        "slice": {
            "count": window.innerWidth > 600 ? 10 : 5,
            "velocity": window.innerWidth > 600 ? 60 : 30,
            "minHeight": 5 / 1000,
            "maxHeight": 6 / 1000,
            "hueRotate": true
        }
    })
}