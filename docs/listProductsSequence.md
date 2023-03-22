```mermaid

sequenceDiagram
    Router->>ProductControler : list(request)
    activate ProductControler

    ProductControler->>GeneralProductsDBManager : listAll()
    activate GeneralProductsDBManager
    GeneralProductsDBManager->>ProductControler : products
    deactivate GeneralProductsDBManager


    loop Each product
        ProductControler->>ProductFactoryChooser : getFactory(type)
        ProductFactoryChooser->>ProductControler : productFactory
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
