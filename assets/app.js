const currentScript = document.currentScript;
const {voyagerIntrospectionQuery: query} = GraphQLVoyager;
const response = await fetch(
        currentScript.dataset.endpoint,
        {
            method: 'post',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({query}),
            credentials: 'omit',
        }
);
const introspection = await response.json();

GraphQLVoyager.renderVoyager(
        document.getElementById(currentScript.dataset.elemid),
        {introspection}
);