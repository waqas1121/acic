import React,{useState,useEffect} from 'react';
import globallink from "../Globalurl";
import axios from 'axios';
import context from 'react-bootstrap/esm/AccordionContext';
import { Markup } from 'interweave';

const Services = () => {
    const [content,setcontent]=useState('')
   
    
    useEffect(() => {

        axios
          .get(globallink.url+'cmspage/'+2)
          .then(response => {
           // setmanageleads({manageleads_array:response.data.cms});
           setcontent(response.data.cms.content)
       

        });
          
      }, []);
      

 
    return (
        <>
            <div className="services py-5">
                <div className="col-xl-11 col-11 mx-auto">
                <Markup content={content} />
                    
                </div>
            </div>
        </>
    )
}

export default Services;
