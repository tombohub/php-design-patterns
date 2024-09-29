/\*\*

- 1.  Create abstract class Restaurant. It's abstract because in it
- we will use abstract method for creating burgers. This will be Creator interface.
- 2.  create abstract Burger. This is the Product interface
- 3.  add protected abstract method to create Burger in Restaurant. That's the factory method. Protected because user don't need to create burger. It's Restaurant class responsibility.
- 4.  Add different Restaurant implementations. Those are Creator implementations.
- 5.  Add different Burger implementations. Those are Product implementations

### Detailed Definitions (gpt)

1. Factory Method
   Definition: A method defined within the Creator Abstraction responsible for creating instances of Product Abstractions. It allows subclasses to decide which specific Product Implementation to instantiate, promoting flexibility and loose coupling in the creation process.
   Purpose: Encapsulates the object creation logic, enabling the system to be more flexible and scalable by allowing new products to be introduced without modifying existing code.
2. Creator Abstraction
   Definition: An abstract class or interface that declares the Factory Method responsible for creating Product objects. It defines the interface for creating objects but leaves the instantiation details to its subclasses.
   Purpose: Serves as the blueprint for concrete creators, ensuring they implement the factory method to instantiate specific products.
3. Product Abstraction
   Definition: An abstract class or interface that defines the structure and behavior of the objects created by the Factory Method. It establishes a common interface for all concrete Product Implementations, ensuring consistency and interchangeability.
   Purpose: Ensures that all products adhere to a common contract, allowing them to be used interchangeably without the client needing to know their specific types.
4. Creator Implementations
   Definition: Concrete classes that extend or implement the Creator Abstraction and provide specific implementations of the Factory Method. These classes instantiate particular Product Implementations, enabling the creation of diverse objects without altering the Creator Abstraction.
   Purpose: Facilitate the creation of specific product types, allowing the system to introduce new products with minimal changes to existing code.
5. Product Implementations
   Definition: Concrete classes that implement the Product Abstraction, representing the actual objects created by the Factory Method. Each implementation provides specific behaviors and properties as defined by the Product Abstraction.
   Purpose: Define the concrete products that the system will use, each adhering to the common interface established by the Product Abstraction.
6. Client
   Definition: The class or component that interacts with the Creator Abstraction to obtain Product Abstractions. The client is unaware of the concrete classes involved in the creation process, relying solely on the abstract interfaces or classes.
   Purpose: Acts as the consumer of the products created by the factory method, ensuring that the client code remains decoupled from the concrete implementations.
