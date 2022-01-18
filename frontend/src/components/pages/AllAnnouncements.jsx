import React,{useState,useEffect} from 'react';
import globallink from "../Globalurl";
import axios from 'axios';
import context from 'react-bootstrap/esm/AccordionContext';
import { Markup } from 'interweave';

const Services = () => {
    const[homeday,setprayer]=useState({prayer_array:[]})
    useEffect(() => {

        axios
        .get(globallink.url+'latest-news')
        .then( response => {
            setprayer({prayer_array:response.data.allpost});

        })
      },[]);
      

 
    return (
        <>
        
            <div className="services py-5">
            <div classname="row" style={{padding: "0px 60px"}}>
            {homeday.prayer_array.map((val,index) => {
                                    
                                    return (
                                        
                <div className="col-xl-6 col-6 mx-auto" >
                <h3>{val.name}</h3>
                <Markup content={val.description}/>
                    
                
                </div>
                )
            })}
            </div>
            </div>
             
        </>
    )
}

export default Services;
