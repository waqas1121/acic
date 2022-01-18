
import React,{useState,useEffect} from 'react';
import globallink from "../Globalurl";
import axios from 'axios';
import context from 'react-bootstrap/esm/AccordionContext';
import { Markup } from 'interweave';
import { Button, FormLabel, Dropdown } from "react-bootstrap";

import mic_icon from "../../images/mic_icon.svg";
import share_icon from "../../images/share_icon.svg";
import play_icon from "../../images/play_icon.svg";
import whatsapp_icon from "../../images/whatsapp_icon.svg";


const Livestream = () => {


    return (
        
        <div className="py-5 video">
            
            <iframe width="100%" height="720" src="https://www.youtube.com/embed/waIgGhK6BAA?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            
        </div>
    );
}

export default Livestream;