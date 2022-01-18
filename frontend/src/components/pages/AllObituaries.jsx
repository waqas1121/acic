import React,{useState,useEffect} from 'react';
import globallink from "../Globalurl";
import axios from 'axios';
import context from 'react-bootstrap/esm/AccordionContext';
import { Markup } from 'interweave';

const Services = () => {
    const[homeday,setprayer]=useState({prayer_array:[]})
    useEffect(() => {

        axios
        .get(globallink.url+'all-obituaries')
        .then( response => {
            setprayer({prayer_array:response.data.allobituaries});

        })
      },[]);
      

 
    return (
        <>
        
            <div className="services py-5">
            <div classname="row" style={{padding: "0px 60px"}}>
            {homeday.prayer_array.map((val,index) => {
                                    
                                    return (
                                        
                <div className="col-xl-6 col-6 mx-auto" style={{float: "left", padding:"0px 30px"}}>
                <h5>{val.name}</h5>
                {val.description}
                    
                
                </div>
                )
            })}
            </div>
            </div>
             
        </>
    )
}

export default Services;
