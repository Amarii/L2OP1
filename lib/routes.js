'use strict'

module.exports = [
    {
        method: 'GET',
        path: '/drawings',
        handler: (request, reply) => {
          reply('All the notes will appear here')
        },
        config: {
          description: 'Gets all the notes available'
        }
      }
]