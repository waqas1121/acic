import React,{useState,useEffect} from 'react';
import globallink from "../Globalurl";
import axios from 'axios';
import context from 'react-bootstrap/esm/AccordionContext';
import { Markup } from 'interweave';

const Detail = (props) => {
    const[recend,setprayer]=useState({recent_array:[]})
   
    
    useEffect(() => {

        axios
          .get(globallink.url+'detail/'+props.match.params.slug)
          .then(response => {
           // setmanageleads({manageleads_array:response.data.cms});
           setprayer({recent_array:response.data.post});
       

        });
          
      }, []);
    return (
        <>
            <div className="services py-5">
                <div className="col-xl-11 col-11 mx-auto">
                    {recend.recent_array.map((val,index) => {
                                    
                                    return (
<>
<h4 class="fontsize18 fontweightbold">{val.title}</h4>
<Markup content={val.description} />
</>
                                        )
                                    })}

                    
                </div>
            </div>
        </>
    )
}

export default Detail;
