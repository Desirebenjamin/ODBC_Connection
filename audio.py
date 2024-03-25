# Import VRAPI
from vpapi import VRAPI


# Initialize VRAPI: Create a VRAPI object and specify the audio input and output devices
vpapi = VRAPI(input_device="Your Microphone", output_device="Your Speakers")


# Start Audio Redirection: Begin real-time audio redirection with the start() method:
vpapi.start()


# (Optional) Apply Audio Filters:
vpapi.add_filter(tf.audio.equalizer_filter(..., frequency_center=..., gain=...))


# Stop Audio Redirection, When finished
vpapi.stop()


