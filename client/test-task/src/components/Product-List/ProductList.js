import { Link } from "react-router-dom";


export default function ProductList(){
  return (
    <div>
        <div>
          <nav>
            <div className="nav-links">
               <Link className="nav-brand" to="/">Product List</Link>
               <div className="nav-btns">
                    <Link to="/addproduct">
                        <button>ADD</button>
                    </Link>
                 <button id="delete-product-btn">
                    MASS DELETE
                 </button>
               </div>
            </div>
            
          </nav>
        </div>
    </div>
  )
}