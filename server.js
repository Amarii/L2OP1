'use strict';

const Hapi = require('hapi')
const Settings = require('./settings')

const server = new Hapi.server({
    port: Settings.port
})

//Routes

server.route({
    method: 'GET',
    path: '/',
    handler: (request, h) => {
        return 'hello, welcome'
    } 
})

server.route({
    method: 'GET',
    path: '/{name}',
    handler: (request, h) => {
        return 'Hello, ' + encodeURIComponent(request.params.name) + '!'
    }
})


//server start
const init = async () => {

    await server.start();
    console.log(`Server running at: ${server.info.uri}`)
}

process.on('unhandledRejection', (err) => {

    console.log(err)
    process.exit(1)
})

init()