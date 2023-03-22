```mermaid

sequenceDiagram
    Router->>ProductControler : list(request)
    activate ProductControler

    ProductControler->>GeneralProductDBManager : listAll()
    activate GeneralProductDBManager
    GeneralProductDBManager->>ProductControler : products
    deactivate GeneralProductDBManager


    loop Each product
        ProductControler->>ProductModelFactory : getFactory(type)
        ProductModelFactory->>ProductControler : productFactory
        ProductControler->>ProductSpecificModelFactory : getSerializer(product)
        ProductSpecificModelFactory->>ProductControler : serializer

        ProductControler->>ProductModelSerializer : getInstanceData(product)
        ProductModelSerializer->>ProductControler : dictionary
        ProductControler->>ProductControler : add dictionary to list
    end
    ProductControler->>Response : new Response(dictionary to json)
    Response->>ProductControler : response
    ProductControler->>Router : reponse


```
