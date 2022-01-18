import React,{useState,useEffect} from 'react';
import globallink from "../Globalurl";
import axios from 'axios';
import {Table} from "react-bootstrap";

const MonthliTiming = () => {
    const[homeday,setprayer]=useState({prayer_array:[]})
    useEffect(() => {

        axios
        .get(globallink.url+'monthly-timing')
        .then( response => {
            setprayer({prayer_array:response.data.homeday});

        })
      },[]);
    return (
        <>
            <div className="py-5">
                <div className="col-xl-11 col-10 mx-auto">
                <Table striped bordered hover>
                    <thead>
                        <tr>
                        <th>Date</th>
                        <th>Imsak</th>
                        <th>Fajr</th>
                        <th>Sunrise</th>
                        <th>Zuhr</th>
                        <th>Sunset</th>
                        <th>Maghrib</th>
                        </tr>
                    </thead>
                    <tbody>
                    {homeday.prayer_array.map((val,index) => {
                      return (
                          <>
                        <tr>
                        <td>{val.day}</td>
                        <td>{val.Imsak}</td>
                        <td>{val.Fajr}</td>
                        <td>{val.Sunrise}</td>
                        <td>{val.Dhuhr}</td>
                        <td>{val.Sunset}</td>
                        <td>{val.Maghrib}</td>
                        </tr>
                    </>
                    )
                })}
                    </tbody>
                    </Table>
                </div>
            </div>
        </>
    )
}

export default MonthliTiming;
