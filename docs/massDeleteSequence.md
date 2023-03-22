```mermaid

sequenceDiagram
    Router->>ProductControler : massDelete(request)

    ProductControler->>GeneralProductDBManager : getByIDs(listOfIds)
    GeneralProductDBManager->>ProductControler : products

    ProductControler->>GeneralProductDBManager : massDelete(products)
    GeneralProductDBManager->>ProductControler : ok

    ProductControler->>Response : new Response()
    Response->>ProductControler : response

    ProductControler->>Router : response




```
