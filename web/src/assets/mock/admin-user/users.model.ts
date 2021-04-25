export class User {
    public user_id: string
    public name: string
    public email: string
    public agency_name: string
    public user_type: string
    public is_active: string

    constructor(
        user_id: string,
        name: string,
        email: string,
        agency_name: string,
        user_type: string,
        is_active: string
    ) {
        this.user_id = user_id
        this.name = name
        this.email = email
        this.agency_name = agency_name
        this.user_type = user_type
        this.is_active = is_active
    }
}