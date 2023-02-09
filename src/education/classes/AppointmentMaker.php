<?php

namespace education\classes;

class AppointmentMaker
{
    private ApptEncoder $encoder;
    #[Inject(ApptEncoder::class)]
    public function setApptEncoder(ApptEncoder $encoder)
    {
        $this->encoder = $encoder;
    }
    public function makeAppointment(): string
    {
        return $this->encoder->encode();
    }

}