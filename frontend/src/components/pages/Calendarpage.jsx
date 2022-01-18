import React, { useState,useEffect } from 'react';
import globallink from "../Globalurl";
import axios from 'axios';
//import Calendar from 'react-calendar';

import vector_logo_6 from "../../images/vector_logo_6.png";
import { Calendar, momentLocalizer } from 'react-big-calendar';
import moment from 'moment';
import Eventss from '../pages/events';
import styl from 'react-big-calendar/lib/css/react-big-calendar.css';


const Calendarpage = () => {
    //const [value, onChange] = useState(new Date());
    const evets_array=[];
    useEffect(() => {     
        axios.get(globallink.url+'all-events')
          .then(response => {  

            response.data.events.map((val,index) => { 
                
                evets_array.push({ id: `${val.id}`, title: `${val.title}`, start: `${val.from_date}`, end: `${val.to_date}`})
            })
            //alert(JSON.stringify(evets_array));
        });          
      }, []);
    const localizer = momentLocalizer(moment);
    
        return (
            
        <>
            <div className="py-5">
                <div className="col-xl-12 col-12 mx-auto">
                    <div className="row gx-0">
                        <div className="col-xl-4"><div className="h-100"><img className="w-100 img-fluid" src={vector_logo_6} alt="vector_logo_6" /></div></div>
                        <div className="col-xl-8">
                        <Calendar
      localizer={localizer}
      events={evets_array}
      startAccessor="start"
      endAccessor="end"
      style={{ height: 1000 }}
    />
    
                        </div>
                       
        
    

                    </div>
                </div>
            </div>
        </>
    
    )
}

export default Calendarpage;
