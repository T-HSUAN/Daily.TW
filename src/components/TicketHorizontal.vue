<template>
    <div class="ticketVertical_container">
        <img :src="require('@/assets/img/ticketExample.png')" alt="斑比山丘門票">
        <div class="ticket_text">
            <h3 class="ticket_title">{{ ticketTitle }}</h3>
            <span class="ticket_tags">{{ticketTags}}</span>
            <div class="ticket_price">
                <span>{{originalPrice}}</span>
                <span>{{ FinalPrice }}</span>
            </div>
        </div>
    
    </div>
    </template>
        
    <script>
        export default {
            props:{
                ticketTitle:String,
                ticketTags:String,
                originalPrice:Number,
                FinalPrice:Number,
            }
        } 
    </script>
        
    <style>
    </style>